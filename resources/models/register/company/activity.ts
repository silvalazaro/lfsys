import { Model } from "@/models/Model";

export class Activity extends Model {
    name:string
    code:string
    constructor(args:any){
        super(args)
    }
}
