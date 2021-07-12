import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { ReservationComponent } from './reservation/reservation.component';
import { CarrouselComponent } from './carrousel/carrousel.component';
import { AsistenteComponent } from './asistente/asistente.component';
import { ClientLayoutComponent } from './client-layout.component';
import { NavbarPModule } from '../../shared/navbar-p/navbar-p.module';
import { SwiperModule } from 'swiper/angular';
import { SwiperHabitationComponent } from './swiper-habitation/swiper-habitation.component';
import { ReservationFromComponent } from './reservation/reservation-from/reservation-from.component';
import { HttpClientModule } from '@angular/common/http';



@NgModule({
  declarations: [
    ReservationComponent,
    CarrouselComponent,
    AsistenteComponent,
    ClientLayoutComponent,
    SwiperHabitationComponent,
    ReservationFromComponent,
    
  ],
  imports: [
    CommonModule,
    NgbModule,
    RouterModule,
    FormsModule,
    NavbarPModule,
    SwiperModule,
    HttpClientModule
  ]
})
export class ClientLayoutModule { }
