import { Component, OnInit } from '@angular/core';
import { ClientService } from '../client.service';
import { Habitation } from '../../../models/habitation';
import { TypeHabitation } from '../../../models/typehabitation';

@Component({
  selector: 'app-reservation',
  templateUrl: './reservation.component.html',
  styleUrls: ['./reservation.component.css']
})
export class ReservationComponent implements OnInit {

  typeHabitations: TypeHabitation[];
  habitations: Habitation[];

  selectReservation: boolean[] = [];
  
  constructor( public _clientService: ClientService ) { 

    _clientService.getTypeHabitation()
                      .subscribe( (resp:TypeHabitation[]) => {
                        this.typeHabitations = resp;
                        console.log(resp);
                        
                        this.typeHabitations.forEach(element => {
                          this.selectReservation.push(false);
                        });
                        
                      });

    _clientService.getHabitations()
                      .subscribe( (resp:Habitation[]) => {
                        this.habitations = resp;
                      } );

  }

  ngOnInit(): void {
    
  }

  reservar(type:TypeHabitation, index: number){

    if( this.selectReservation[index] == false ) this.selectReservation[index] = true;
    else this.selectReservation[index] = false;
    
  }

  filterHabitations(type: TypeHabitation){
    var filterHab: Habitation[] = [];
    
    this.habitations.forEach(element => {
      if( element.id_room_type == type.id ){
        filterHab.push(element);
      }
    });
        
    return filterHab;
  }

}
