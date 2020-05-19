import {Injectable} from '@angular/core';
import {BehaviorSubject} from "rxjs";
import {Character} from "../models/character";
import {HttpClient} from "@angular/common/http";
import {take} from "rxjs/operators";

@Injectable({
    providedIn: 'root'
})
export class CharacterService {

    private _characters: BehaviorSubject<Character[]> = new BehaviorSubject<Character[]>([]);

    private _character: BehaviorSubject<Character> = new BehaviorSubject<Character>({
        'char_name': '',
        'description': '',
        'xp': '',
        'lvl': '',
        'max_hp': '',
        'attack': '',
        'defense': '',
        'accuracy': '',
        'gold': '',
        'clas_name': '',
        'race_name': '',
        'user_name': ''
    });

    constructor(private http: HttpClient) {
    }

    get characters() {
        return this._characters.asObservable();
    }

    get character() {
        return this._character.asObservable();
    }

    getCharactersByUserRequest() {
            const tokenData = JSON.parse(window.localStorage.getItem('okta-token-storage'));
            const token = tokenData.accessToken.value;

            const headers: any = {
                headers:
                    {
                        'Content-type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': 'Beared ' + token
                    }
            };

            this.http.get('http://localhost/RPG/PHP/wscharacters', headers).subscribe((response: any) => {
                for (let i = 0; i < response.length; i++) {
                    let characters = response[i];
                    this._characters.pipe(take(1)).subscribe((chars) => {
                        this._characters.next(chars.concat(characters));
                    });
                }

            });
    }

    getCharacterByNameRequest(char_name = null) {
        if (char_name != null && char_name != '') {
            // TOKENS + HEADERS
            const tokenData = JSON.parse(window.localStorage.getItem('okta-token-storage'));
            const token = tokenData.accessToken.value;

            const headers: any = {
                headers:
                    {
                        'Content-type': 'application/json',
                        'Accept': 'application/json',
                        'Authorization': 'Beared ' + token
                    }
            };

            this.http.get('http://localhost/PHP/RPG/wscharacter/' + char_name, headers).subscribe((response: any) => {
                let character = response;
                this._character.pipe(take(1)).subscribe((cha) => {
                    this._character.next(cha = character);
                });

            });
        }
    }
}
