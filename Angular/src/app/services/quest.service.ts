import { Injectable } from '@angular/core';
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
    'quantity_item': '',
    'gold_reward': '',
    'monster_name': '',
    'xp_reward': '',
    'repeatable': ''
  })

  constructor(private http: HttpClient) { }

  get quests(){
    return this._quests.asObservable();
  }

  get quest(){
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

}
