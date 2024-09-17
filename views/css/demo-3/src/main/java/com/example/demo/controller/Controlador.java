package com.example.demo.controller;
//UserController.java
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;
import com.example.demo.service.*;
import java.util.ArrayList;
import java.util.List;


@RestController
@RequestMapping("/api/users")
public class Controlador {

 @Autowired
 private Servicio userService;


 @GetMapping("/{id}")
 public ArrayList getId(@PathVariable Long id) {
     ArrayList gen = userService.generador();
     String existe = "no";
     for(int i = 0; i < 5; i++) {
    	 if(gen.get(i) == id) {
    		 existe = "si";
    	 }
     }
     ArrayList res = new ArrayList<>();
     res.add("Existe: "+existe);
     res.add("Identificador: "+id);
     res.add(gen);
     
     return res;
 }
}