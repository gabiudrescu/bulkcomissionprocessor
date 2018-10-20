import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { PreloadAllModules, RouterModule } from '@angular/router';
import {ModelModule} from './model';
import {RestModule} from './rest';

import { AppComponent } from './app.component';
import { Page404Component } from './page404/page-404.component';
import { ROUTES } from './app.routes';

@NgModule({
  declarations: [
    AppComponent,
    Page404Component
  ],
  imports: [
    CommonModule,
    BrowserModule,
    HttpClientModule,
    ModelModule,
    RestModule.forRoot(),
    RouterModule.forRoot(ROUTES, {
      useHash: Boolean(history.pushState) === false,
      preloadingStrategy: PreloadAllModules
    }),
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
