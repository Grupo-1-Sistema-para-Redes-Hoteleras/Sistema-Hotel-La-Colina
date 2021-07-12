import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SwiperHabitationComponent } from './swiper-habitation.component';

describe('SwiperHabitationComponent', () => {
  let component: SwiperHabitationComponent;
  let fixture: ComponentFixture<SwiperHabitationComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ SwiperHabitationComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(SwiperHabitationComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
