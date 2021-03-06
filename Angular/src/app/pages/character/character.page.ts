import {Component, ElementRef, OnInit, ViewChild} from '@angular/core';
import {Character} from "../../models/character";
import {Chart} from 'chart.js';
import {ActivatedRoute, Router} from "@angular/router";
import {CharacterService} from "../../services/character.service";

@Component({
    selector: 'app-character',
    templateUrl: './character.page.html',
    styleUrls: ['./character.page.scss'],
})
export class CharacterPage implements OnInit {

    @ViewChild('canvasChart', {static: true}) canvasChart: ElementRef;

    constructor(
        private route: Router,
        private activatedRoute: ActivatedRoute,
        private characterService: CharacterService
    ) {
    }

    public token: String;

    character: Character = {
        'char_name': '',
        'description': '',
        'xp': 0,
        'lvl': 0,
        'max_hp': 0,
        'attack': 0,
        'defense': 0,
        'accuracy': 0,
        'gold': 0,
        'clas_name': '',
        'race_name': '',
        'user_name': ''
    };

    createChart() {
        let statsData = [];
        statsData.push(this.character.attack);
        statsData.push(this.character.defense);
        statsData.push(this.character.accuracy);
        statsData.push(this.character.max_hp);

        let chart = new Chart(this.canvasChart.nativeElement, {
            type: 'radar',
            data: {
                labels: ['Accuracy', 'Attack', 'Defense', 'MaxHP'],
                datasets: [{
                    label: 'Stats',
                    data: statsData,
                    backgroundColor: ['rgba(200, 200, 200, 0.5)'],
                    borderColor: ['rgba(200, 200, 200, 1.0)'],
                    pointBackgroundColor: [
                        'rgba(207, 131, 119)',
                        'rgba(201, 144, 72)',
                        'rgba(83, 114, 69)',
                        'rgba(228, 189, 65)'],
                    borderWidth: 1,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                display: true,
                scale: {
                    angleLines: {
                        display: false
                    },
                    ticks: {
                        suggestedMin: 0,
                    }
                }
            }
        });
    }

    ngOnInit() {
        this.activatedRoute.paramMap.subscribe((paramMap) => {
            const char_name = paramMap.get('char_name');

            this.characterService.getCharacterByNameRequest(char_name);
            this.characterService.character.subscribe((char) => {
                this.character = char;
                this.createChart();
            });
        });
    }

}
