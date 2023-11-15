import {baseUrl} from "../vue/configs.js";

const mixins = {
    async fetchBranches ()
    {
        try {
            const response = await fetch(baseUrl + '/branches');
            const {data: branches} = await response.json();
            this.branches = branches;
        } catch (error) {
            console.error(error);
        }
    }

}


export { mixins }
