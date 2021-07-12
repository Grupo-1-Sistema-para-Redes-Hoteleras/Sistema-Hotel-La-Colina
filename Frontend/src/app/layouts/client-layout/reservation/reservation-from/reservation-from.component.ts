import { Component, Input, OnInit } from '@angular/core';
import { Habitation } from '../../../../models/habitation';
import { NgForm } from '@angular/forms';

@Component({
  selector: 'reservation-from',
  templateUrl: './reservation-from.component.html',
  styleUrls: ['./reservation-from.component.css']
})
export class ReservationFromComponent implements OnInit {

@Input() habitations: Habitation[];

habitation: Habitation = {id:'',id_room_type:'',price:0,status:'',number:0,description:''};

  constructor() { 
  }
  
  ngOnInit(): void {
    
  }

  selectHabitation(id: string){

    this.habitations.forEach(element => {
        if( element.id == id ) this.habitation = element;
    });
    
  }

  habitationSubmit(form: NgForm){
    console.log(form.value);
  }
  clientSubmit(form: NgForm){
    console.log(form.value);
  }
  reservationSubmit(form: NgForm){
    console.log(form.value);
  }

}
