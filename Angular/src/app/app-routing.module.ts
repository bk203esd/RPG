import {NgModule} from '@angular/core';
import {PreloadAllModules, RouterModule, Routes} from '@angular/router';
import {OktaAuthGuard, OktaCallbackComponent} from '@okta/okta-angular';

const routes: Routes = [
    {path: '', redirectTo: 'home', pathMatch: 'full'},
    {
        path: 'home', loadChildren: () => import('./home/home.module').then(m => m.HomePageModule),
        canActivate: [OktaAuthGuard]
    },
    {
        path: '',
        redirectTo: 'home',
        pathMatch: 'full'
    },
    {
        path: 'login',
        loadChildren: () => import('./pages/login/login.module').then(m => m.LoginPageModule)
    },
    {path: 'implicit/callback', component: OktaCallbackComponent},
    {
        path: 'character',
        loadChildren: () => import('./pages/character/character.module').then(m => m.CharacterPageModule),
        canActivate: [OktaAuthGuard]
    },
    {
        path: 'characters',
        loadChildren: () => import('./pages/characters/characters.module').then(m => m.CharactersPageModule),
        canActivate: [OktaAuthGuard]
    },
    {
        path: 'quests',
        loadChildren: () => import('./pages/quests/quests.module').then(m => m.QuestsPageModule),
        canActivate: [OktaAuthGuard]
    },
    {
        path: 'quest',
        loadChildren: () => import('./pages/quest/quest.module').then(m => m.QuestPageModule),
        canActivate: [OktaAuthGuard]
    },
];

@NgModule({
    imports: [
        RouterModule.forRoot(routes, {preloadingStrategy: PreloadAllModules})
    ],
    exports: [RouterModule]
})
export class AppRoutingModule {
}
