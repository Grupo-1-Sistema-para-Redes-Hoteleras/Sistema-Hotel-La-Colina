import { Component, OnInit } from '@angular/core';
import { ClientService } from './client.service';
import { Service } from '../../models/service';

@Component({
  selector: 'app-client-layout',
  templateUrl: './client-layout.component.html',
  styleUrls: ['./client-layout.component.css']
})
export class ClientLayoutComponent implements OnInit {

  items: Service[];
  serviceSelect: Service = {id:"",name:"",icono:"",imges:[],price:0,status:"",description:"",id_Admin:""};
  
  
  constructor( private _clientServices: ClientService) { 
    
    this._clientServices.getServices()
              .subscribe( (resp:Service[]) => {
                  this.items = resp;
                  console.log(this.items);
                  this.serviceSelect = resp[0];
    });
   }
  
  ngOnInit(): void {
        
  }

  selectService(service: any){
    this.serviceSelect = service;    
  }

}

export const DataServices: any[] = [
  { name: 'hospedaje', icono: 'icono-1.png', description: 'Habitaciones con todo lo que deseas en comodidad',  img: ['https://images.unsplash.com/photo-1566073771259-6a8506099945?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80','https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=750&q=80','https://images.unsplash.com/photo-1527142879-95b61a0b8226?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=731&q=80'] },
  { name: 'piscina',   icono: 'icono-2.png', description: 'Piscina de lujo',                                   img: ['https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80','https://images.unsplash.com/photo-1603991488459-73de26c7c4f8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=667&q=80','https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=750&q=80'] },
  { name: 'masaje',    icono: 'icono-3.png', description: 'Masajes de espalda y cuerpo entero',                img: ['https://images.unsplash.com/photo-1600334129128-685c5582fd35?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80','https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=750&q=80','https://images.unsplash.com/photo-1611072172377-0cabc3addb30?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=752&q=80'] },
  { name: 'tour',      icono: 'icono-4.png', description: 'Tour por la zona turistica',                        img: ['https://images.unsplash.com/photo-1512704515581-de233a09dae8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=793&q=80','https://images.unsplash.com/photo-1535507262368-51b419302759?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=333&q=80','https://images.unsplash.com/photo-1519915247718-1703f9c6bb15?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=834&q=80'] },
  { name: 'souvenir',  icono: 'icono-5.png', description: 'Lo mejor de souvenir para recordar tu experiencia', img: ['https://images.unsplash.com/photo-1493479874819-4303c36fa0f9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80','https://images.unsplash.com/photo-1542372177-002ea9732b17?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80','https://images.unsplash.com/photo-1542371927-2d9a6fae1794?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80'] }
]