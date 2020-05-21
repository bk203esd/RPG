import {Component, OnInit} from '@angular/core';
import {Quest} from "../../models/quest";
import {QuestService} from "../../services/quest.service";

@Component({
    selector: 'app-quests',
    templateUrl: './quests.page.html',
    styleUrls: ['./quests.page.scss'],
})
export class QuestsPage implements OnInit {

    constructor(
        private questService: QuestService
    ) {
    }

    public token: String;

    quests: Quest[] = []

    ngOnInit() {
        this.questService.getQuestsRequest();
        this.questService.quests.subscribe((que) => {
            this.quests = que;
        })
    }

}
