import { Component, ViewEncapsulation, ViewChild, Input } from "@angular/core";
import { SwiperComponent } from "swiper/angular";

// import Swiper core and required modules
import SwiperCore, { Navigation, Thumbs } from "swiper/core";

// install Swiper modules
SwiperCore.use([Navigation, Thumbs]);

@Component({
  selector: 'swiper-habitation',
  templateUrl: './swiper-habitation.component.html',
  styleUrls: ['./swiper-habitation.component.scss'],
  encapsulation: ViewEncapsulation.None,
})
export class SwiperHabitationComponent  {

  @Input() images: any[];

  thumbsSwiper: any;

  constructor() { }

}
