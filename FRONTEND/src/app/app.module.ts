import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app.routes';
import { AppComponent } from './app.component';
import { HeaderComponent } from './components/header/header.component';
import { FooterComponent } from './components/footer/footer.component';
import { NavBarComponent } from './components/nav-bar/nav-bar.component';
import { HeroSctionComponent } from './components/hero-sction/hero-sction.component';
import { HomeComponent } from './pages/home/home.component';
import { LogInComponent } from './pages/log-in/log-in.component';
import { SignUpComponent } from './pages/sign-up/sign-up.component';
import { AdminComponent } from './pages/admin/admin.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { AuthService } from './services/auth.service';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    FooterComponent,
    NavBarComponent,
    HeroSctionComponent,
    HomeComponent,
    LogInComponent,
    SignUpComponent,
    AdminComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    ReactiveFormsModule,
  ],
  providers: [AuthService],
  bootstrap: [AppComponent]
})
export class AppModule { }
