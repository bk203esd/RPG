import {NgModule} from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';
import {Router, RouteReuseStrategy} from '@angular/router';

import {IonicModule, IonicRouteStrategy} from '@ionic/angular';
import {SplashScreen} from '@ionic-native/splash-screen/ngx';
import {StatusBar} from '@ionic-native/status-bar/ngx';

import {AppComponent} from './app.component';
import {AppRoutingModule} from './app-routing.module';
import {OKTA_CONFIG, OktaAuthModule} from '@okta/okta-angular';
import {HttpClientModule} from '@angular/common/http';

export function onAuthRequired(oktaAuth, injector) {
    const router = injector.get(Router);
    router.navigate(['/login']);
}

export const WS_BASE_URL = 'http://localhost';
export const IDENTITY_PROVIDER = '';

const oktaConfig = {
  issuer: 'https://dev-446810.okta.com/oauth2/default',
  redirectUri: 'http://localhost:8100/implicit/callback',
  clientId: '0oaazlg1tOkjuaIYc4x6',
  pkce: true,
  onAuthRequired: onAuthRequired
};

@NgModule({
    declarations: [AppComponent],
    entryComponents: [],
    imports: [BrowserModule, IonicModule.forRoot(), AppRoutingModule, OktaAuthModule, HttpClientModule],
    providers: [
        StatusBar,
        SplashScreen,
        {provide: RouteReuseStrategy, useClass: IonicRouteStrategy},
        {provide: OKTA_CONFIG, useValue: oktaConfig}
    ],
    bootstrap: [AppComponent]
})
export class AppModule {
}
