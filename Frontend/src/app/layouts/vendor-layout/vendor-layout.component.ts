import { Component, OnInit } from '@angular/core';
import { Vendor } from '../../models/vendor';

@Component({
  selector: 'app-vendor-layout',
  templateUrl: './vendor-layout.component.html',
  styleUrls: ['./vendor-layout.component.css']
})
export class VendorLayoutComponent implements OnInit {

  confirm: boolean = false;
  vendor: Vendor;

  constructor() { }

  ngOnInit(): void {
  }

  confirmaProveedor( argumento: boolean ){
    this.confirm = argumento;
    
  }

  getCodigo( argumento: any ){
    console.log(argumento);
    this.vendor = argumento;
  }

}
