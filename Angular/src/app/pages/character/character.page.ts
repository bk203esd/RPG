import {Component, ElementRef, OnInit, ViewChild} from '@angular/core';
import {Character} from "../../models/character";
import {Chart} from 'chart.js';

@Component({
    selector: 'app-character',
    templateUrl: './character.page.html',
    styleUrls: ['./character.page.scss'],
})
export class CharacterPage implements OnInit {

    @ViewChild('canvasChart', {static: true}) canvasChart: ElementRef;

    constructor() {
    }

    public token: String;

    character: Character = {
        'char_name': 'guillelf',
        'description': 'Elfo + Guillem',
        'xp': '15',
        'lvl': '25',
        'max_hp': 100,
        'attack': 40,
        'defense': 75,
        'accuracy': 30,
        'gold': '25',
        'clas_name': 'Arquero',
        'race_name': 'Elfo',
        'user_name': 'bk203esd'
    };

    createChart() {
        let statsData = [];
        statsData.push(this.character.max_hp);
        statsData.push(this.character.attack);
        statsData.push(this.character.defense);
        statsData.push(this.character.accuracy);
        console.log(statsData);

        let chart = new Chart(this.canvasChart.nativeElement, {
            type: 'radar',
            data: {
                labels: ['MaxHP', 'Attack', 'Defense', 'Accuracy'],
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
                display: true
            }
        });
    }

    ngOnInit() {
        this.createChart();
    }

}
