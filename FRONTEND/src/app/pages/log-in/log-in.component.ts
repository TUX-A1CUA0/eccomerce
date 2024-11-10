import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';


@Component({
  selector: 'app-log-in',
  templateUrl: './log-in.component.html',
  standalone: true,
  imports: [CommonModule, FormsModule], // Added HttpClientModule to imports array
})
export class LogInComponent {

}
