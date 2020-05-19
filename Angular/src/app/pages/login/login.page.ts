import {Component, OnInit} from '@angular/core';

import * as OktaSignIn from '@okta/okta-signin-widget';

import {OktaAuthService} from '@okta/okta-angular';

@Component({
    selector: 'app-login',
    templateUrl: './login.page.html',
    styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {
    // configuracio del widget
    /*private widget: OktaSignIn = new OktaSignIn({
        baseUrl: 'https://dev-446810.okta.com',
        authParams: {
            pkce: true
        }
    });*/

    // configuració del widget per a okta google
    private widget: OktaSignIn = new OktaSignIn({
        baseUrl: 'https://dev-446810.okta.com',
        clientId: '0oa4bwjx2Rzdcjj0F4x6',
        authParams: {
            redirectUri: 'http://localhost:8100/implicit/callback',
            authorizedUrl: 'https://dev-446810.okta.com/oauth2/v1/authorize',
            responseMode: 'query',
            responseType: ['code'],
            pkce: true
        },
        features: {idpDiscovery: true},
        idps: [
            {type: 'GOOGLE', id: '0oa4yhcy8B0X1IC4g4x6'}
        ]
    });


    constructor(private oktaAuth: OktaAuthService) {
    }

    ngOnInit() {
        this.widget.renderEl({
                el: '#okta-signin-container'
            }, (result) => {
                if (result.status == 'SUCCESS') {
                    this.oktaAuth.loginRedirect('/', {sessionToken: result.session.token});
                }
            },
            (error) => {
                console.log('error!!');
            });
    }

}
