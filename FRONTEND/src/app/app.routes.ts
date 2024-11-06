// FRONTEND/src/app/app.routes.ts
import { Routes } from '@angular/router';

import { LogInComponent } from './pages/log-in/log-in.component';
import { SignUpComponent } from './pages/sign-up/sign-up.component';
import { HomeComponent } from './pages/home/home.component';
import { AdminComponent } from './pages/admin/admin.component';

export const routes: Routes = [
  {
    path: '',
    component: HomeComponent,
  },
  {
    path: 'log-in', // Remove leading slash
    component: LogInComponent,
  },
  {
    path: 'sign-up', // Remove leading slash
    component: SignUpComponent,
  },
  {
    path: 'admin',
    component: AdminComponent,
  },
];