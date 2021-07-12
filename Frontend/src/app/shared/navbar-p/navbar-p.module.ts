import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { NavbarPComponent } from './navbar-p.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';



@NgModule({
  imports: [ RouterModule, CommonModule, NgbModule ],
  declarations: [ NavbarPComponent ],
  exports: [ NavbarPComponent ]
})

export class NavbarPModule { }
