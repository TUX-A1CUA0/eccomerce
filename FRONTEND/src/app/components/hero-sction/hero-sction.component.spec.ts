import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HeroSctionComponent } from './hero-sction.component';

describe('HeroSctionComponent', () => {
  let component: HeroSctionComponent;
  let fixture: ComponentFixture<HeroSctionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [HeroSctionComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(HeroSctionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
