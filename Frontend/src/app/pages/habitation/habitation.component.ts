import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-habitation',
  templateUrl: './habitation.component.html',
  styleUrls: ['./habitation.component.css']
})
export class HabitationComponent implements OnInit {

  items: any[] = Data;

  constructor() { }

  ngOnInit(): void {
  }

}

export const Data: any[] = [
  { id: '123',  type: 'duplex',        price: 36.738,  status: 'limpia',          num: '1' },
  { id: '456',  type: 'duplex',        price: 23.789,  status: 'ocupada',         num: '2' },
  { id: '789',  type: 'duplex',        price: 36.738,  status: 'mantenimiento',   num: '3' },
  { id: '101',  type: 'duplex',        price: 56.142,  status: 'limpia',          num: '4' },
  { id: '102',  type: 'duplex',        price: 38.735,  status: 'mantenimiento',   num: '5' },
  { id: '103',  type: 'duplex',        price: 36.738,  status: 'desocupada',      num: '6' },
  { id: '104',  type: 'matrimonial',   price: 36.738,  status: 'limpia',          num: '7' },
  { id: '105',  type: 'matrimonial',   price: 56.142,  status: 'mantenimiento',   num: '8' },
  { id: '106',  type: 'matrimonial',   price: 36.738,  status: 'limpia',          num: '9' },
  { id: '107',  type: 'matrimonial',   price: 36.738,  status: 'ocupada',         num: '10' },
  { id: '108',  type: 'matrimonial',   price: 23.789,  status: 'limpia',          num: '11' },
  { id: '109',  type: 'matrimonial',   price: 36.738,  status: 'mantenimiento',   num: '12' },
  { id: '110',  type: 'matrimonial',   price: 38.735,  status: 'desocupada',      num: '13' },
  { id: '111',  type: 'matrimonial',   price: 78.615,  status: 'ocupada',         num: '14' }

]