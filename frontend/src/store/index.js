import { createStore } from 'vuex'

export default createStore({
  state: {
    dataLocal: {} // объект dataLocal
  },
  mutations: {
    setDataLocal(state, newData) {
      state.dataLocal = newData
    }
  },
  actions: {
    updateDataLocal({ commit }, newData) {
      commit('setDataLocal', newData)
    }
  },
  getters: {
    getDataLocal(state) {
      return state.dataLocal
    }
  }
})
