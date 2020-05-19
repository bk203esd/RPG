import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { QuestsPageRoutingModule } from './quests-routing.module';

import { QuestsPage } from './quests.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    QuestsPageRoutingModule
  ],
  declarations: [QuestsPage]
})
export class QuestsPageModule {}
