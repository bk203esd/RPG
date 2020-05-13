import {Component, OnInit} from '@angular/core';
import {Character} from "../../models/character";

@Component({
    selector: 'app-characters',
    templateUrl: './characters.page.html',
    styleUrls: ['./characters.page.scss'],
})
export class CharactersPage implements OnInit {

    constructor() {
    }

    public token: String;

    characters: Character[] = [
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
    ]

    ngOnInit() {
    }

}
