import {Injectable} from '@angular/core';
import {BehaviorSubject} from "rxjs";
import {Quest} from "../models/quest";
import {HttpClient} from "@angular/common/http";
import {take} from "rxjs/operators";

@Injectable({
    providedIn: 'root'
})
export class QuestService {

    private _quests: BehaviorSubject<Quest[]> = new BehaviorSubject<Quest[]>([]);

    private _quest: BehaviorSubject<Quest> = new BehaviorSubject<Quest>({
        'quest_name': '',
        'description': '',
        'item_reward': '',
        'gold_reward': 0,
        'monster_name': '',
        'xp_reward': 0,
        'repeatable': true
    })

    constructor(private http: HttpClient) {
    }

    get quests() {
        return this._quests.asObservable();
    }

    get quest() {
        return this._quest.asObservable();
    }

    getQuestsRequest() {
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

        this.http.get('http://localhost/RPG/PHP/wsquests', headers).subscribe((response: any) => {
            for (let i = 0; i < response.length; i++) {
                let quests = response[i];
                this._quests.pipe(take(1)).subscribe((que) => {
                    this._quests.next(que.concat(quests));
                });
            }

        });
    }

    getQuestByNameRequest(quest_name) {
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

        this.http.get('http://localhost/RPG/PHP/wsquest/' + quest_name, headers).subscribe((response: any) => {
            let quest = response;
            this._quest.pipe(take(1)).subscribe((que) => {
                this._quest.next(que = quest);
            });

        });
    }

}
