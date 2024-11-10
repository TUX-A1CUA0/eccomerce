import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';
import { Router } from '@angular/router';

@Component({
  selector: 'app-sign-up',
  templateUrl: './sign-up.component.html',
  standalone: true,
  imports: [CommonModule, FormsModule], // Added HttpClientModule to imports array
})
export class SignUpComponent {
  
}
