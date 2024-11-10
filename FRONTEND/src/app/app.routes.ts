import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './pages/home/home.component';
import { LogInComponent } from './pages/log-in/log-in.component';
import { SignUpComponent } from './pages/sign-up/sign-up.component';
import { AdminComponent } from './pages/admin/admin.component';
import { AuthGuard } from './guard/auth.guard';


const routes: Routes = [
    { path: '', component: HomeComponent },
    { path: 'login', component: LogInComponent },
    { path: 'signup', component: SignUpComponent },
    { path: 'admin', component: AdminComponent, canActivate: [AuthGuard] },
    { path: '**', redirectTo: '', pathMatch: 'full' }
];

export const AppRoutingModule = RouterModule.forRoot(routes);
