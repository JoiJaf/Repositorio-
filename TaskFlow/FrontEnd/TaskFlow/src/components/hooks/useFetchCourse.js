import { useEffect, useState } from "react";
import Cookies from 'js-cookie';

export const useFetchCourse = () => {

  const [data, setData] = useState([]);
  const [isLoading, setIsLoading] = useState(true);

  const datos = Cookies.get('auth');
  const userId = JSON.parse(datos).id;

  const getData = async () => {
    console.log("antes del try");
    try {
      const response = await fetch(`http://localhost/taskflowbackend/public/api/courses/${userId}`);
      //const data = await response.json();
      const course = await response.json();
      setData(course);
      setIsLoading(false);

      console.log("en el try");
    } catch (error) {
      console.log(error);
    }
  };

  useEffect(() => {
    getData();
  }, []);

  console.log(data);
  return {
    data,
    isLoading,
  };
};
