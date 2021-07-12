import { Injectable } from '@angular/core';
import { Habitation } from '../../models/habitation';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class ClientService {

  private url = 'http://localhost/hotel';
  
  
  constructor( private _http: HttpClient ) { }

  getTypeHabitation(){

    return this._http.get(`${ this.url }/TablaTipo_Habitacion/`);
  }

  getServices(){

    return this._http.get(`${ this.url }/TablaServicio/`);                  
  }

  getHabitations(){
    return this._http.get(`${ this.url }/TablaHabitaciones/`);
  }

/*
  newMovie( movie: any ){

    return this._http.post(`${ this.url }/movies.json`, movie);

  }


  getHabitations(){
    return this.habitations;
  }


  private crearArreglo( datasObj: object ){

    const datas: any[] = [];
    const imgs: any[] = [];

    if ( datasObj === null ) { return []; }

    Object.keys( datasObj ).forEach( key => {

      const data: any = datasObj[key];
      data.id = key;

      if( data.imgs) {
        var img: any[] = [];
        Object.keys( data.imgs ).forEach( key => {
  
          img.push(data.imgs[key]);
  
        });
        data.imgs = img;
      }

      datas.push( data );     
     
    });

    return datas;
  }*/

  
}


