package com.example.demo.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import com.example.demo.service.*;
import java.util.ArrayList;
import java.util.List;
import java.util.Random;

@Service
public class Servicio {

 @Autowired

 public ArrayList generador() {
	 ArrayList ar = new ArrayList<>();
	 for(int i = 0; i < 5; i++) {
		 ar.add((Math.round(Math.random()*100)));
	 }
	 return ar;
 }

}