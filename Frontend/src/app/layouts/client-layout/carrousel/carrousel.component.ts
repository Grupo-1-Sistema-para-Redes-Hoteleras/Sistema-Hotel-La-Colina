import { Component, Input, OnInit, ViewEncapsulation, ViewChild } from "@angular/core";
import { SwiperComponent } from "swiper/angular";

// import Swiper core and required modules
import SwiperCore, { EffectCoverflow, Pagination } from "swiper/core";

// install Swiper modules
SwiperCore.use([EffectCoverflow, Pagination]);

@Component({
  selector: 'carrousel',
  templateUrl: './carrousel.component.html',
  styleUrls: ['./carrousel.component.scss'],
  encapsulation: ViewEncapsulation.None,
})
export class CarrouselComponent implements OnInit {

  @Input() data: any;

  constructor() { }

  ngOnInit(): void {
  }

}
