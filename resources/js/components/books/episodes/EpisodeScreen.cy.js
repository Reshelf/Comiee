import EpisodeScreen from './EpisodeScreen.vue'

describe('<EpisodeScreen />', () => {
  it('renders', () => {
    // see: https://on.cypress.io/mounting-vue
    cy.mount(EpisodeScreen)
  })
})