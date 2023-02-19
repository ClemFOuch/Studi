import 'package:flutter/material.dart';
import 'package:ventalis_mobile/pages/detail_command_page.dart';

class CommandPage extends StatefulWidget {
  const CommandPage({Key? key}) : super(key: key);

  @override
  State<CommandPage> createState() => _CommandPageState();
}

class _CommandPageState extends State<CommandPage> {

  final commands = [
    {
      "title": "Commande du ",
      "date": "14/02/23",
      "commandContent": "lorem ipsum dolor sit amet"
    },
    {
      "title": "Commande du ",
      "date": "16/02/23",
      "commandContent": "lorem ipsum dolor sit amet"
    },
    {
      "title": "Commande du ",
      "date": "18/02/23",
      "commandContent": "lorem ipsum dolor sit amet"
    },
    {
      "title": "Commande du ",
      "date": "20/02/23",
      "commandContent": "lorem ipsum dolor sit amet"
    }
  ];

  @override
  Widget build(BuildContext context) {
    return Center(
      child: ListView.builder(
        itemCount: commands.length,
        itemBuilder: (context, index) {
          final command = commands[index];
          final title = command['title'];
          final date = command['date'];
          final subtitle = command['commandContent'];
          return GestureDetector(
            onTap: (){
              Navigator.push(context, MaterialPageRoute(builder: (context)=>DetailCommand()));
            },
            child: Card(
              child: ListTile(
                leading: Image.asset("assets/images/planet.png"),
                title : Text("$title $date"),
                subtitle: Text("$subtitle"),
                trailing: Icon(Icons.arrow_forward_ios_rounded),
              ),
            ),
          );
        },
      ),
    );
  }
}



  