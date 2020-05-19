import { Component, OnInit } from '@angular/core';
import {Quest} from "../../models/quest";

@Component({
  selector: 'app-quest',
  templateUrl: './quest.page.html',
  styleUrls: ['./quest.page.scss'],
})
export class QuestPage implements OnInit {
// TODO hacer quest
  constructor() { }

  public token: String;

  quest: Quest = {
    'quest_name': 'Dragonicidio',
    'description': 'Mata al dragón que ataca la aldea',
    'item_reward': 'Escama de dragón',
    'quantity_item': 5,
    'gold_reward': 2500,
    'monster_name': 'Dragón ancestral',
    'xp_reward': 50500,
    'repeatable': false
  }

  ngOnInit() {
  }

}
