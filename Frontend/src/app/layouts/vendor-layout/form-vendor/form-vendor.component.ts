import { Component, Input, OnInit, Output, EventEmitter } from '@angular/core';
import { Vendor } from '../../../models/vendor';
import { NgForm } from '@angular/forms';

@Component({
  selector: 'app-form-vendor',
  templateUrl: './form-vendor.component.html',
  styleUrls: ['./form-vendor.component.css']
})
export class FormVendorComponent implements OnInit {

  @Input() vendor: Vendor;
  @Output() confirm = new EventEmitter<boolean>();

  constructor() { }

  ngOnInit(): void {
  }

  noSubmit(){
    this.confirm.emit(false);
  }
  onSubmit(form:NgForm){
    console.log(form.value);
  } 
}
