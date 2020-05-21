import {Component, OnInit} from '@angular/core';
import {Quest} from "../../models/quest";
import {ActivatedRoute, Router} from "@angular/router";
import {QuestService} from "../../services/quest.service";

@Component({
    selector: 'app-quest',
    templateUrl: './quest.page.html',
    styleUrls: ['./quest.page.scss'],
})
export class QuestPage implements OnInit {
// TODO hacer quest
    constructor(
        private route: Router,
        private activatedRoute: ActivatedRoute,
        private questService: QuestService
    ) {
    }

    public token: String;

    quest: Quest = {
        'quest_name': '',
        'description': '',
        'item_reward': '',
        'gold_reward': 0,
        'monster_name': '',
        'xp_reward': 0,
        'repeatable': false
    }

    ngOnInit() {
        this.activatedRoute.paramMap.subscribe((paramMap) => {
            const quest_name = paramMap.get('quest_name');

            this.questService.getQuestByNameRequest(quest_name);
            this.questService.quest.subscribe((que) => {
                this.quest = que;
                console.log(this.quest);
            })

        })
    }

}
