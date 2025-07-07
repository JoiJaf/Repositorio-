import { useEffect, useState } from "react";

export const useFetchSearchCategory = (id) => {
  const [isLoading, setIsLoading] = useState(true);
  const [data, setData] = useState([]);
 
  const getData = async () => {
    console.log("antes del try");
    try {
      const response = await fetch("http://localhost/taskflowbackend/public/api/events/"+id);
      console.log(id);
      //const data = await response.json();
      const events = await response.json();
      setData(events);
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
