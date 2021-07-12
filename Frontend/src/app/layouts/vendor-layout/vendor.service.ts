import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class VendorService {

  private url = 'http://localhost/hotel/TablaProveedor';

  constructor( private _http: HttpClient) { }


  getVendor( id: string ){
    return this._http.get(`${this.url}/?id=${id}`);
  }

}
