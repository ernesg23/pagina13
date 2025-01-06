/*
  "https://esm.run/@mlc-ai/web-llm" siempre es la versión más reciente, 
  https://cdn.jsdelivr.net/npm/@mlc-ai/web-llm@0.2.46/+esm tiene una versión fija 
*/
import { CreateWebWorkerMLCEngine } from "https://cdn.jsdelivr.net/npm/@mlc-ai/web-llm@0.2.46/+esm";

const $ = (el) => document.querySelector(el);

// Pongo delante de la variable un símbolo de $ para indicar que es un elemento del DOM
const $form = $('.aiForm');
const $input = $('.aiInput');
const $template = $('#message-template');
const $messages = $('.messages-list');
const $container = $('.mainCont');
const $button = $('.aiSendBtn');
const $info = $('small');
const $loading = $('.loading');

let messages = [];
let end = false;

const SELECTED_MODEL = 'Phi-3-mini-4k-instruct-q4f16_1-MLC';

const engine = await CreateWebWorkerMLCEngine(
  new Worker('./views/js/worker.js', { type: 'module' }),
  SELECTED_MODEL,
  {
    initProgressCallback: (info) => {
      $info.textContent = info.text;
      if (info.progress === 1 && !end) {
        end = true;
        $loading?.parentNode?.removeChild($loading);
        $button.removeAttribute('disabled');
        addMessage("¡Hola! Soy Andromeda, tu asistente para la creación de posts. ¿En qué puedo ayudarte hoy?", 'bot');
        $input.focus();
      }
    }
  }
);

$form.addEventListener('submit', async (event) => {
  event.preventDefault();
  const messageText = $input.value.trim();

  if (messageText !== '') {
    // Añadimos el mensaje en el DOM
    $input.value = '';
  }

  addMessage(messageText, 'user');
  $button.setAttribute('disabled', '');

  const userMessage = {
    role: 'user',
    content: messageText
  };

  messages.push(userMessage);

  const chunks = await engine.chat.completions.create({
    messages,
    stream: true
  });

  let reply = "";

  const $botMessage = addMessage("", 'bot');

  for await (const chunk of chunks) {
    const choice = chunk.choices[0];
    const content = choice?.delta?.content ?? "";
    reply += content;
    $botMessage.textContent = reply;
  }

  $button.removeAttribute('disabled');
  messages.push({
    role: 'assistant',
    content: reply
  });
  $container.scrollTop = $container.scrollHeight;
});

function addMessage(text, sender) {
  // Clonar el template
  const clonedTemplate = $template.content.cloneNode(true);
  const $newMessage = clonedTemplate.querySelector('.message');

  const $who = $newMessage.querySelector('span');
  const $text = $newMessage.querySelector('p');

  $text.textContent = text;
  $who.textContent = sender === 'bot' ? '🚀' : 'Vos';
  $newMessage.classList.add(sender);

  $messages.appendChild($newMessage);

  $container.scrollTop = $container.scrollHeight;

  return $text;
}