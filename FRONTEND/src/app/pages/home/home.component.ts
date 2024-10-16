import { Component } from '@angular/core';
import { FooterComponent } from '../../components/footer/footer.component';
import { HeaderComponent } from '../../components/header/header.component';
import { NavBarComponent } from '../../components/nav-bar/nav-bar.component';
import { HeroSctionComponent } from '../../components/hero-sction/hero-sction.component';
@Component({
  selector: 'app-home',
  standalone: true,
  imports: [
    FooterComponent,
    HeaderComponent,
    NavBarComponent,
    HeroSctionComponent,
  ],
  templateUrl: './home.component.html',
  styleUrl: './home.component.css',
})
export class HomeComponent {}
