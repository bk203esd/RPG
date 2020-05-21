import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { QuestPage } from './quest.page';

const routes: Routes = [
  {
    path: ':quest_name',
    component: QuestPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class QuestPageRoutingModule {}
