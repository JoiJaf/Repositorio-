import { useEffect, useState } from "react";
import Cookies from 'js-cookie';

export const useFetchEvent = () => {

  const [isLoading, setIsLoading] = useState(true);
  const [data, setData] = useState([]);

  const datos = Cookies.get('auth');
  const userId = JSON.parse(datos).id;
 
  const getData = async () => {
    try {
      const response = await fetch(`http://localhost/taskflowbackend/public/api/events/${userId}`);
      //const data = await response.json();
      const events = await response.json();
      setData(events);
      setIsLoading(false);

    } catch (error) {
      console.log(error);
    }
  };

  useEffect(() => {
    getData();
  }, []);


  return {
    data,
    isLoading,
  };
};
