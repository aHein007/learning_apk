import moment from "moment/moment";

export function dateFormate(value)
{
    if(value){
        return moment(String(value)).format('d/m/y');
    }
}
