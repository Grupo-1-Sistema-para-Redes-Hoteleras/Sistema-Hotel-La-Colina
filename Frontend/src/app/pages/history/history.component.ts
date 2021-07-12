import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-history',
  templateUrl: './history.component.html',
  styleUrls: ['./history.component.css']
})
export class HistoryComponent implements OnInit {

  items: any[] = Data;

  constructor() { }

  ngOnInit(): void {
  }

}

export const Data: any[] = [
  { idFactura: '123',   date: '05-16-2020',   idClient: '131', idTrabajador: '234',   cant: 20,   monto: 19.654 },
  { idFactura: '123',   date: '05-16-2020',   idClient: '131', idTrabajador: '234',   cant: 20,   monto: 19.654 },
  { idFactura: '123',   date: '05-16-2020',   idClient: '131', idTrabajador: '234',   cant: 20,   monto: 19.654 },
  { idFactura: '123',   date: '05-16-2020',   idClient: '131', idTrabajador: '234',   cant: 20,   monto: 19.654 },
  { idFactura: '123',   date: '05-16-2020',   idClient: '131', idTrabajador: '234',   cant: 20,   monto: 19.654 },
  { idFactura: '123',   date: '05-16-2020',   idClient: '131', idTrabajador: '234',   cant: 20,   monto: 19.654 },
  { idFactura: '123',   date: '05-16-2020',   idClient: '131', idTrabajador: '234',   cant: 20,   monto: 19.654 },
  { idFactura: '123',   date: '05-16-2020',   idClient: '131', idTrabajador: '234',   cant: 20,   monto: 19.654 },
  { idFactura: '123',   date: '05-16-2020',   idClient: '131', idTrabajador: '234',   cant: 20,   monto: 19.654 },
  { idFactura: '123',   date: '05-16-2020',   idClient: '131', idTrabajador: '234',   cant: 20,   monto: 19.654 },
  { idFactura: '123',   date: '05-16-2020',   idClient: '131', idTrabajador: '234',   cant: 20,   monto: 19.654 },
  { idFactura: '123',   date: '05-16-2020',   idClient: '131', idTrabajador: '234',   cant: 20,   monto: 19.654 },
  { idFactura: '123',   date: '05-16-2020',   idClient: '131', idTrabajador: '234',   cant: 20,   monto: 19.654 },
  { idFactura: '123',   date: '05-16-2020',   idClient: '131', idTrabajador: '234',   cant: 20,   monto: 19.654 },
  { idFactura: '123',   date: '05-16-2020',   idClient: '131', idTrabajador: '234',   cant: 20,   monto: 19.654 },
  { idFactura: '123',   date: '05-16-2020',   idClient: '131', idTrabajador: '234',   cant: 20,   monto: 19.654 }
]