import {Component, OnInit} from '@angular/core';
import {Character} from "../../models/character";
import {CharacterService} from "../../services/character.service";

@Component({
    selector: 'app-characters',
    templateUrl: './characters.page.html',
    styleUrls: ['./characters.page.scss'],
})
export class CharactersPage implements OnInit {

    constructor(
        private characterService: CharacterService
    ) {
    }

    public token: String;

    characters: Character[] = [];

    ngOnInit() {
        this.characterService.getCharactersByUserRequest();
        this.characterService.characters.subscribe((chars) => {
            this.characters = chars;
            console.log(this.characters);
        })
    }

}
