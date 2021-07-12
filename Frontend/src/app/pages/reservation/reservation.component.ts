import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-reservation',
  templateUrl: './reservation.component.html',
  styleUrls: ['./reservation.component.css']
})
export class ReservationComponent implements OnInit {

  items: any[] = Data;

  constructor() { }

  ngOnInit(): void {
  }

}

export const Data: any[] = [
  { id: '123',  dateInit: '04-06-2020',   dateFinal: '10-06-2020',   habitation: '24',  typeHabitation: 'Duplex',  nameClient: 'Rodolfo Aldana',   status: 'sin confirmar' },
  { id: '456',  dateInit: '04-06-2020',   dateFinal: '05-06-2020',   habitation: '21',  typeHabitation: 'Duplex',  nameClient: 'Rosalinda Marchan',   status: 'pagado' },
  { id: '789',  dateInit: '05-06-2020',   dateFinal: '30-06-2020',   habitation: '01',  typeHabitation: 'Matrimonial',  nameClient: 'Jorge Camacho',   status: 'confirmado' },
  { id: '101',  dateInit: '06-06-2020',   dateFinal: '20-06-2020',   habitation: '12',  typeHabitation: 'Duplex',  nameClient: 'Chin Chu Casa',   status: 'confirmado' },
  { id: '102',  dateInit: '07-06-2020',   dateFinal: '15-06-2020',   habitation: '07',  typeHabitation: 'Matrimonial',  nameClient: 'Maria Perez',   status: 'sin confirmar' }
]
