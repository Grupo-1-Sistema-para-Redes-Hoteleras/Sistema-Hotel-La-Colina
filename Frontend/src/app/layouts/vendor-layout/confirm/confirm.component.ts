import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import { NgForm } from '@angular/forms';
import { VendorService } from '../vendor.service';
import { Vendor } from '../../../models/vendor';

@Component({
  selector: 'app-confirm',
  templateUrl: './confirm.component.html',
  styleUrls: ['./confirm.component.css']
})
export class ConfirmComponent implements OnInit {

  @Output() confirm = new EventEmitter<boolean>();
  @Output() codigo = new EventEmitter<any>();  

  codigo_temp:string;

  constructor( private _vendorService: VendorService) { }

  ngOnInit(): void {
  }

  onSubmit(form:NgForm){

       
    if(form.valid == true ){

      this._vendorService.getVendor(this.codigo_temp).subscribe(
        resp => {

          if(resp[0]){
            
            this.codigo.emit(resp[0]);   
            this.confirm.emit(true);
            
          }
        
        },
        error => {
          console.log(<any>error);
          this.confirm.emit(false);
        }
      );
      
            
    }
    
  }

  noSubmit(){
    var vacio: Vendor = {id:'', name:'',lastname:'',status:'',email:'',telf:'',direction:'',id_Admin:''};
    this.confirm.emit(true);
    this.codigo.emit(vacio);
  }

}
