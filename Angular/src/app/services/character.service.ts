import {Injectable} from '@angular/core';
import {BehaviorSubject} from "rxjs";
import {Character} from "../models/character";
import {HttpClient} from "@angular/common/http";
import {take} from "rxjs/operators";

@Injectable({
    providedIn: 'root'
})
export class CharacterService {

    private _characters: BehaviorSubject<Character[]> = new BehaviorSubject<Character[]>([
        {
            'char_name': 'guillelf',
            'description': 'Elfo + Guillem',
            'xp': '15',
            'lvl': '25',
            'max_hp': '100',
            'attack': '25',
            'defense': '25',
            'accuracy': '25',
            'gold': '25',
            'clas_name': 'Arquero',
            'race_name': 'Elfo',
            'user_name': 'bk203esd'
        },
        {
            'char_name': 'Jordiorc',
            'description': 'Orco + Jordi',
            'xp': '80',
            'lvl': '10',
            'max_hp': '100',
            'attack': '15',
            'defense': '17',
            'accuracy': '3',
            'gold': '2',
            'clas_name': 'Guerrero',
            'race_name': 'Orco',
            'user_name': 'bk203esd'
        }
    ]);

    private _character: BehaviorSubject<Character> = new BehaviorSubject<Character>({
        'char_name': 'guillelf',
        'description': 'Elfo + Guillem',
        'xp': '15',
        'lvl': '25',
        'max_hp': '100',
        'attack': '25',
        'defense': '25',
        'accuracy': '25',
        'gold': '25',
        'clas_name': 'Arquero',
        'race_name': 'Elfo',
        'user_name': 'bk203esd'
    });

    constructor(private http: HttpClient) {
    }

    get characters() {
        return this._characters.asObservable();
    }

    get character() {
        return this._character.asObservable();
    }

    getCharactersByUserRequest(user_name = null) {
        if (user_name != null && user_name != '') {
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

            this.http.get('http://localhost/PHP/RPG/wscharacters/' + user_name, headers).subscribe((response: any) => {
                for (let i = 0; i < response.length; i++) {
                    let characters = response[i];
                    this._characters.pipe(take(1)).subscribe((chars) => {
                        this._characters.next(chars.concat(characters));
                    });
                }

            });
        }
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
