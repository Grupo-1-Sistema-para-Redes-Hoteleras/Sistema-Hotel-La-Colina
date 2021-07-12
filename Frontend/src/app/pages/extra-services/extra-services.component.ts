import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-extra-services',
  templateUrl: './extra-services.component.html',
  styleUrls: ['./extra-services.component.css']
})
export class ExtraServicesComponent implements OnInit {

  items: any[] = Data;

  constructor() { }

  ngOnInit(): void {
  }

}

export const Data: any[] = [
  { name: 'piscina',   price: 3,   status: 'activo', ico: 'nc-support-17',     description: 'Piscina Playera' },
  { name: 'masajes',   price: 20,  status: 'activo', ico: 'nc-tap-01',         description: 'Masajes de cuerpo completo' },
  { name: 'paseos',    price: 10,  status: 'activo', ico: 'nc-bus-front-12',   description: 'Tour por lugares turisticos' },
  { name: 'souvenir',  price: 0,   status: 'inactivo', ico: 'nc-cart-simple',  description: 'Recuerdos de nuestra autoria' }
]