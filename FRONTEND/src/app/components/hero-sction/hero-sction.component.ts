import {
  Component,
  HostListener,
  NgZone,
  ChangeDetectorRef,
} from '@angular/core';

@Component({
  selector: 'app-hero-sction',
  standalone: true,
  imports: [],
  templateUrl: './hero-sction.component.html',
  styleUrls: ['./hero-sction.component.css'],
})
export class HeroSctionComponent {
  x = 0;
  y = 0;

  constructor(private ngZone: NgZone, private cdr: ChangeDetectorRef) {}

  @HostListener('document:mousemove', ['$event'])
  onMouseMove(e: MouseEvent) {
    this.ngZone.run(() => {
      this.x = e.clientX;
      this.y = e.clientY;
      this.cdr.detectChanges();
    });
  }

  // Add this method to force change detection when needed
  detectChanges() {
    this.cdr.detectChanges();
  }
}
